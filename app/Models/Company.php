<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'company';
    
    /**
     * The primary key of table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['id','name','taxcode','address','logo','phone','email','homepage','intro'];
    /**
     * update Company infomation
     */
    public function updateCompany($companyInfo){
        $company = $this->firstOrFail();
        $this->setCompanyInfo($company, $companyInfo);
        $company->save();
    }

    /**
     * set param for save or update
     */
    private function setCompanyInfo($company, $companyInfo){
        $company->name =  $companyInfo['name'];
        $company->taxcode = $companyInfo['taxcode'];
        $company->address = $companyInfo['address'];
        $company->logo = $companyInfo['logo'];
        $company->phone = $companyInfo['phone'];
        $company->email = $companyInfo['email'];
        $company->homepage = $companyInfo['homepage'];
        $company->intro = $companyInfo['intro'];
        return $company;
    }
}
