<?php

namespace App\Console\Commands;

use App\Company;
use App\CustomersOrders;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckExpireDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will check companies expire date!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        check licence
        $expDate = Company::where('id',1)->first()->expire_date;
        $expDate = strtotime($expDate);
        if (time() >= $expDate ){
            $company = Company::find(1);
            $company->status = 0;
            $company->save();
//            DB::table('companies')->where('expire_date',$action_date)->update(['status' => 0]);
        }

//        delete old orders
        $orders = CustomersOrders::all();
        foreach ($orders as $order){
            $order_date = strtotime($order->order_date);
            $exp_date = $order_date + (212 * 24 * 60 * 60);
            if (time() > $exp_date){
                foreach ($order->ordered_products as $ordered_product){
                    foreach ($ordered_product->ordered_products_attributes as $ordered_products_attribute){
                        $ordered_products_attribute->delete();
                    }
                    $ordered_product->delete();
                }
                $order->delete();
            }
        }
    }
}
