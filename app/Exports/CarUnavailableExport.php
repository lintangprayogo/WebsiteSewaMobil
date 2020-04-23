<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Booking;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CarUnavailableExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking::select("customers.name as customer","email","phone","address","nik","brand_name","police_number","rent_start_date as start","rent_end_date as end")
            ->join("cars",'cars.id',"=","Bookings.car_id")->join("customers","customers.id","=","Bookings.customer_id")
            ->join("brands","brands.id","=","cars.brand_id")->where("ongoing","=",1)
            ->get();
    }

     public function headings(): array
    {
        return ["Customer", "Email", "Phone","Address","NIK","Brand","Police Number","Start","End"];
    }
}
