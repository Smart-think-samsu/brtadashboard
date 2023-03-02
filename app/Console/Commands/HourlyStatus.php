<?php

namespace App\Console\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Console\Command;
use App\Models\Brtabookings;
use App\Models\Brtastatus;
use Illuminate\Support\Facades\Http;
use DB;

class HourlyStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hourly:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       

            $bookingdatas = Brtabookings::where('booking_status','Booked')->get();  
            $data = Http::post('https://www.bpodms.gov.bd/app_dommail_internal_api/public/ws/login', [
            'user_id' => '1215005',
            'password' => '007007',
            'user_group' => 'POSTAGE_POS',
            'hnddevice' =>'990008670634968',
            ]);
            $post = json_decode($data->getBody()->getContents());
            //dd($post);

            foreach($bookingdatas as $bookingdata){
                    //dd($bookingdata->barcode);
                    $response = Http::withHeaders(['Authorization'=> 'Bearer '.$post->token])->post('https://www.bpodms.gov.bd/app_dommail_internal_api/public/ws/reportsingle', [
                        'user_id' => '1215005',
                        'user_group' => 'POSTAGE_POS',
                        'my_branch_code' => $post->my_emts_branch_code,
                        'item_id' => $bookingdata->item_id, 
                        'report_flag' => 'deliver_point_deliver_return_item_search',
                        'hnddevice' =>'990008670634968'
                    ]);
                    //dd($response);
                    $chackpost = json_decode($response->getBody()->getContents());
                // dd($chackpost);

                    if($chackpost->status ==  'Deny: Item ID:'.$bookingdata->item_id.' has already Delivered to Receipient'){
        
                    
                        Brtabookings::where('item_id', $bookingdata->item_id)
                            ->update(['booking_status' => 'Delivered']);

                    }            
                }  
       


        info('call every hour');

        return 0;
    }
}
