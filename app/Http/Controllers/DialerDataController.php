<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AggregatorNdrData;
use App\Models\DialerData;
use App\Models\DialerResponseLog;
use App\Models\tbl_aggregator_ndr_data;

class DialerDataController extends Controller
{
    public function storeDialerData(Request $request)
    {
        $data = $request->all();

        if (!$data) {
            return response()->json(['error' => 'Failed to decode JSON response.'], 400);
        }

        $requestId = null;

        try {
            DB::beginTransaction();

            // Fetch the related aggregator data
            $aggregatorData = tbl_aggregator_ndr_data::where('id', $data['uni_id'])->first();

            if (!$aggregatorData) {
                throw new \Exception("No data found for the given ID.");
            }

            // Insert into tbl_dialer_data
            $dialerData = DialerData::create([
                'foreign_id' => $data['uni_id'] ?? null,
                'agent_name' => $data['agent_name'] ?? null,
                'employee_code' => $data['employee_code'] ?? null,
                'crm_duration' => $data['crm_duration'] ?? null,
                'call_duration' => $data['call_duration'] ?? null,
                'start_time' => $data['start_time'] ?? null,
                'end_time' => $data['end_time'] ?? null,
                'disposition' => $data['disposition'] ?? null,
                'sub_disposition' => $data['sub_disposition'] ?? null,
                'remarks' => $data['remarks'] ?? null,
                'call_recording_url' => $data['call_recording_url'] ?? null,
            ]);

            $requestId = $dialerData->id;

            // Commit transaction
            DB::commit();

            // Log the successful request
            DialerResponseLog::create([
                'request_id' => $requestId,
                'status' => 'success',
                'error_message' => null,
                'data' => json_encode($data),
            ]);

            return response()->json(['message' => 'Data successfully saved to the database.']);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the failed request
            DialerResponseLog::create([
                'request_id' => $requestId,
                'status' => 'failure',
                'error_message' => $e->getMessage(),
                'data' => json_encode($data),
            ]);

            return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
