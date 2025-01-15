<?php

namespace App\Http\Controllers;

use App\Models\tbl_aggregator_ndr_data;
use App\Models\tbl_create_ndr_importing_log;
use App\Models\tbl_dialer_insert_api_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class NdrImportController extends Controller
{
    // public function importNdr(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:csv|max:1005097',
    //     ]);

    //     $file = $request->file('file');
    //     $fileName = $file->getClientOriginalName();
    //     $fileSize = $file->getSize();

    //     $importLog = tbl_create_ndr_importing_log::create([
    //         'file_name' => $fileName,
    //         'file_size' => $fileSize,
    //         'entries_fetched' => 0,
    //     ]);

    //     try {
    //         DB::beginTransaction();

    //         // Read the Excel file
    //         $data = Excel::toArray([], $file)[0];
    //         $entries = [];

    //         foreach ($data as $index => $row) {
    //             if ($index == 0) continue; // Skip the header row

    //             // Combine address fields for full address
    //             $fullAddress = trim($row[9]); // 'Customer_Address' column (index 9)

    //             $entries[] = [
    //                 'teleproject_id' => '', // 'Order_ID' column (index 39)
    //                 'uni_id' =>  uniqid(), // 'Uni_id' column (index 36), or generate unique ID
    //                 'mobile' => $row[5], // 'Phone_Number' column (index 5)
    //                 'customer_alternate_mobile' => $row[34], // 'Alternate_number_shared' column (index 34)
    //                 'attempts' => 0, // Map status to attempts
    //                 'data_received_date' => \Carbon\Carbon::createFromFormat('d-m-Y', $row[14])->format('Y-m-d'), // 'Data_Received_Date' column (index 14)
    //                 'awb_number' => $row[6], // 'AWB_Number' column (index 6)
    //                 'courier_partner' => $row[8], // 'Courier_Partner' column (index 8)
    //                 'order_date' =>
    //                 \Carbon\Carbon::createFromFormat('d-m-Y', $row[19])->format('Y-m-d'), // 'Order_Date' column (index 19)
    //                 'order_id' => $row[39], // 'Order_ID' column (index 39)
    //                 'pickup_date' =>
    //                 \Carbon\Carbon::createFromFormat('d-m-Y', $row[20])->format('Y-m-d'), // 'Pickup_Date' column (index 20)
    //                 'latest_ndr_reason' => $row[17], // 'Latest_NDR_Reason' column (index 17)
    //                 'customer_name' => $row[11], // 'Customer_Name' column (index 11)
    //                 'customer_email' => $row[23], // 'Mobile' column (index 23) acting as email
    //                 'customer_address' => $fullAddress, // Combined address
    //                 'customer_city' => $row[10], // 'Customer_City' column (index 10)
    //                 'customer_state' => $row[13], // 'Customer_State' column (index 13)
    //                 'customer_pincode' => $row[12], // 'Customer_Pincode' column (index 12)
    //                 'mode_of_payment' => $row[18], // 'Mode_of_payment' column (index 18)
    //                 'product_name' => $row[21], // 'Product_Name' column (index 21)
    //                 'invoice_value' => $row[16], // 'Invoice_Value' column (index 16)
    //                 'client_name' => $row[7], // 'Name_of_Client' column (index 7)
    //                 'source' => $row[22], // 'Source' column (index 22)
    //                 'number_of_attempts' => 0, // Total number of attempts
    //                 'pickup_requested_on' => $row[20], // 'Pickup_Date' column (index 20)
    //                 'pickup_name' => $row[11], // Use 'Customer_Name' as pickup name
    //                 'pickup_address' => $row[9], // Use 'Customer_Address' as pickup address
    //             ];
    //         }


    //         // Insert data in chunks to prevent exceeding limits
    //         $chunkSize = 100; // Adjust this value as needed
    //         $totalEntries = count($entries);

    //         foreach (array_chunk($entries, $chunkSize) as $chunk) {
    //             tbl_aggregator_ndr_data::insert($chunk);
    //         }

    //         $importLog->update(['entries_fetched' => $totalEntries]);

    //         DB::commit();
    //         return response()->json(['message' => 'File imported successfully!']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         $importLog->update(['error_log' => $e->getMessage()]);
    //         return response()->json(['error' => 'Failed to import file: ' . $e->getMessage()], 500);
    //     }
    // }
    // public function importNdr(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:csv|max:1005097',
    //     ]);

    //     $file = $request->file('file');
    //     $fileName = $file->getClientOriginalName();
    //     $fileSize = $file->getSize();

    //     $importLog = tbl_create_ndr_importing_log::create([
    //         'file_name' => $fileName,
    //         'file_size' => $fileSize,
    //         'entries_fetched' => 0,
    //     ]);

    //     try {
    //         DB::beginTransaction();

    //         // Read the Excel file
    //         $data = Excel::toArray([], $file)[0];
    //         $entries = [];

    //         foreach ($data as $index => $row) {
    //             if ($index == 0) continue; // Skip the header row
    //             if (count($row) < 40) { // Assuming the file should have at least 40 columns
    //                 throw new \Exception("Row $index is missing required columns.");
    //             }
    //             if (empty(array_filter($row))) {
    //                 continue;
    //             }
    //             // Combine address fields for full address
    //             $fullAddress = trim($row[9]);

    //             $entries[] = [
    //                 'teleproject_id' => '',
    //                 'uni_id' => uniqid(),
    //                 'mobile' => $row[5],
    //                 'customer_alternate_mobile' => $row[34],
    //                 'attempts' => 0,
    //                 'data_received_date' => \Carbon\Carbon::parse($row[14])->format('Y-m-d'),
    //                 'awb_number' => $row[6],
    //                 'courier_partner' => $row[8],
    //                 'order_date' => \Carbon\Carbon::parse($row[19])->format('Y-m-d'),
    //                 'order_id' => $row[39],
    //                 'pickup_date' => \Carbon\Carbon::parse($row[20])->format('Y-m-d'),
    //                 'latest_ndr_reason' => $row[17],
    //                 'customer_name' => $row[11],
    //                 'customer_email' => $row[23],
    //                 'customer_address' => $fullAddress,
    //                 'customer_city' => $row[10],
    //                 'customer_state' => $row[13],
    //                 'customer_pincode' => $row[12],
    //                 'mode_of_payment' => $row[18],
    //                 'product_name' => $row[21],
    //                 'invoice_value' => $row[16],
    //                 'client_name' => $row[7],
    //                 'source' => $row[22],
    //                 'number_of_attempts' => 0,
    //                 'pickup_requested_on' => $row[20],
    //                 'pickup_name' => $row[11],
    //                 'pickup_address' => $row[9],
    //             ];
    //             Log::error("Row $index passed");
    //         }

    //         // Insert data in chunks, even if there is only one row
    //         if (!empty($entries)) {
    //             $chunkSize = 100; // Adjust this value as needed
    //             foreach (array_chunk($entries, $chunkSize) as $chunk) {
    //                 tbl_aggregator_ndr_data::insert($chunk);
    //             }
    //         }

    //         $totalEntries = count($entries);
    //         $importLog->update(['entries_fetched' => $totalEntries]);

    //         DB::commit();
    //         return response()->json(['message' => 'File imported successfully!']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         $importLog->update(['error_log' => $e->getMessage()]);
    //         return response()->json(['error' => 'Failed to import file: ' . $e->getMessage()], 500);
    //     }
    // }

    public function sendNdrToApi($ndrRequestId)
    {
        try {
            // Fetch the NDR data by ID
            $row = tbl_aggregator_ndr_data::find($ndrRequestId);

            if (!$row) {
                throw new \Exception("No NDR data found with ID: {$ndrRequestId}");
            }

            // Prepare data for the API
            $dataNdr = [
                "data" => [
                    [
                        "Phone_Number" => $row->mobile,
                        "Data_Received_Date" => $row->data_received_date,
                        "AWB_Number" => $row->awb_number,
                        "Courier_Partner" => $row->courier_partner,
                        "Order_Date" => $row->order_date,
                        "Pickup_Date" => $row->pickup_date,
                        "Latest_NDR_Reason" => $row->latest_ndr_reason,
                        "Customer_Name" => $row->customer_name,
                        "Customer_Address" => $row->customer_address,
                        "Customer_City" => $row->customer_city,
                        "Customer_State" => $row->customer_state,
                        "Customer_Pincode" => $row->customer_pincode,
                        "Mode_of_Payment" => $row->mode_of_payment,
                        "Product_Name" => $row->product_name,
                        "Invoice_Value" => $row->invoice_value,
                        "Name_of_Client" => $row->client_name,
                        "Uni_id" => $row->id,
                        "House_Number" => '',
                        "Building_Name" => '',
                        "Area_Locality_Street_Address" => '',
                        "Landmark" => '',
                        "City" => '',
                        "Pincode" => '',
                        "Alternate_number_shared" => '',
                        "Alternate_number_Yes" => '',
                        "Preferred_date_time_for_delivery" => '',
                        "courier_partner_contact_the_cus" => '',
                        "Order_ID" =>
                        $row->order_id,
                    ]
                ],
                "process_id" => "25",
                "campaign_id" => "45"
            ];

            // Send API request using Laravel HTTP Client
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Cookie' => 'san_Id=bhsejb9ka2ipu4d04l2guao79qeb526t'
            ])->post('http://14.195.6.75:8807/crm/Commonapi/BulkSend', $dataNdr);

            // Log API response
            $responseBody = $response->json();
            $responseStatus = $response->successful() ? 'success' : 'failure';

            // Prepare log data
            $logData = [
                'ndr_request_id' => $ndrRequestId,
                'request_payload' => json_encode($dataNdr),
                'response_status' => $responseStatus,
                'response_data' => json_encode($responseBody),
                'created_at' => now(),
                'updated_at' => now()
            ];

            // Insert log into the database
            tbl_dialer_insert_api_log::create($logData);

            return response()->json(['message' => 'API request sent successfully!', 'response' => $responseBody], 200);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to send NDR data to API', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return response()->json(['error' => 'Failed to send NDR data to API: ' . $e->getMessage()], 500);
        }
    }

    public function importNdr(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv|max:1005097',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getSize();

        // Create log entry
        $importLog = tbl_create_ndr_importing_log::create([
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'entries_fetched' => 0,
        ]);

        try {
            DB::beginTransaction();

            // Read the Excel file
            $data = Excel::toArray([], $file)[0];
            $entries = [];

            foreach ($data as $index => $row) {
                if ($index == 0) continue; // Skip the header row

                if (count($row) < 40) { // Ensure the row has required columns
                    throw new \Exception("Row $index is missing required columns.");
                }

                if (empty(array_filter($row))) {
                    continue;
                }

                // Combine address fields for full address
                $fullAddress = trim($row[9]);

                $entries[] = [
                    'teleproject_id' => '',
                    'uni_id' => uniqid(),
                    'mobile' => $row[5],
                    'customer_alternate_mobile' => $row[34],
                    'attempts' => 0,
                    'data_received_date' => \Carbon\Carbon::parse($row[14])->format('Y-m-d'),
                    'awb_number' => $row[6],
                    'courier_partner' => $row[8],
                    'order_date' => \Carbon\Carbon::parse($row[19])->format('Y-m-d'),
                    'order_id' => $row[39],
                    'pickup_date' => \Carbon\Carbon::parse($row[20])->format('Y-m-d'),
                    'latest_ndr_reason' => $row[17],
                    'customer_name' => $row[11],
                    'customer_email' => $row[23],
                    'customer_address' => $fullAddress,
                    'customer_city' => $row[10],
                    'customer_state' => $row[13],
                    'customer_pincode' => $row[12],
                    'mode_of_payment' => $row[18],
                    'product_name' => $row[21],
                    'invoice_value' => $row[16],
                    'client_name' => $row[7],
                    'source' => $row[22],
                    'number_of_attempts' => 0,
                    'pickup_requested_on' => $row[20],
                    'pickup_name' => $row[11],
                    'pickup_address' => $row[9],
                    'ndr_coming_through' => 'bulk_import', // Since it is bulk importing
                    'log_id' => $importLog->id, // Foreign key reference to the log table
                ];

                Log::info("Row $index passed");
            }

            // Insert data in chunks, even if there is only one row
            if (!empty($entries)) {
                $chunkSize = 100; // Adjust this value as needed
                foreach (array_chunk($entries, $chunkSize) as $chunk) {
                    tbl_aggregator_ndr_data::insert($chunk);

                    $lastInsertedIds = tbl_aggregator_ndr_data::orderBy('id', 'desc')
                        ->take(count($chunk))
                        ->pluck('id')
                        ->toArray();

                    // Send each row to the API
                    foreach ($lastInsertedIds as $id) {
                        $this->sendNdrToApi($id); // Call the function here
                    }
                }
            }

            $totalEntries = count($entries);
            $importLog->update(['entries_fetched' => $totalEntries]);

            DB::commit();
            return response()->json(['message' => 'File imported successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            $importLog->update(['error_log' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to import file: ' . $e->getMessage()], 500);
        }
    }
}
