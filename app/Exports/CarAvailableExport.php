<?php

namespace App\Exports;
use App\Models\Car;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CarAvailableExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      return Car::select("brand_name","police_number","color","year")
            ->join("brands","brands.id","=","cars.brand_id")->where("available","=",1)
            ->get();
    }


    public function headings(): array
    {
        return ["Brand","Police Number","Color","Year"];
    }
}
