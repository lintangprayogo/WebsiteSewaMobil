<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Booking;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IncomeExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

       
     public function __construct($start,$end)
    {
        $this->start=$start;
        $this->end=$end;
        
        return $this;
    }

 
    public function collection()
    {
       return Booking::select("customers.name as customer",
          "brand_name","police_number","rent_start_date as start","rent_end_date as end","total")
            ->join("cars",'cars.id',"=","Bookings.car_id")->join("customers","customers.id","=","Bookings.customer_id")
            ->join("brands","brands.id","=","cars.brand_id")->whereBetween('bookings.created_at', [$this->start, $this->end])
            ->get();
    }

     public function headings(): array
    {
        return ["Customer", "Brand", "Police Number","Start","End","Total"];
    }

}
