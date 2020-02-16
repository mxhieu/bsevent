<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRepresentatives extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companyrepresentatives';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function getCompanyRepresensatives(){
        return $this->where('is_deleted', 0)->orderBy('created_at','desc')->get();
    }

    /**
     * add company representatives infomation
     */
    public function addCompanyRepresentatives($data){
        $companyReRepresentatives = new CompanyRepresentatives();
        $this->setCompanyePresentativesInfo($companyReRepresentatives, $data);
        $companyReRepresentatives->save();
    }

    /**
     * update company representatives infomation
     */
    public function updateCompanyRepresentatives($id,$data){
        $companyReRepresentatives = $this->findOrFail($id);
        $this->setCompanyePresentativesInfo($companyReRepresentatives, $data);
        $companyReRepresentatives->save();
    }

    /**
     * set param for save or update
     */
    private function setCompanyePresentativesInfo($companyRe, $companyReInfo){
        $companyRe->name =  $companyReInfo['representatives_name'];
        $companyRe->taxcode = $companyReInfo['representatives_taxcode'];
        $companyRe->address = $companyReInfo['representatives_address'];
        $companyRe->phone = $companyReInfo['representatives_phone'];
        $companyRe->email = $companyReInfo['representatives_email'];
        return $companyRe;
    }
}
