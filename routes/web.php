<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
	'as' => 'mainsite',
	'uses' => 'MainsiteController'
]);

Route::get('download/{fileName}', [
	'as' => 'downloadattachfile',
	'uses' => 'BaseAdminController@downloadAttachFile'
]);

Route::group(['prefix' => 'supplier','namespace' => 'supplier'], function(){
	Route::group(['prefix' => '','namespace' => 'supplierlist'], function(){
		Route::get('listdata','SupplierList')->name('supplierlist');
		Route::match(['get','post'],'list/{id?}','SupplierView')->name('supplier');
		Route::post('addsupplier','AddSupplierAction')->name('addsupplieraction');
		Route::post('edit/{id}','EditSupplier')->name('editsupplier');
		Route::get('delete/{id}','DeleteSupplier')->name('deletesupplier');
		Route::group(['prefix' => 'item','namespace' => 'item'], function(){
			Route::get('{id}/listdata', 'ItemSupplierList')->name('itemsupplierlist');
			Route::get('{id}/list/{itemId?}', 'ItemSupplierView')->name('itemsupplierview');
			Route::post('{id}/additem','AddItemSupplierAction')->name('additemsupplieraction');
			Route::post('{supplierId}/edititem/{itemId}','EditItemSupplier')->name('edititemsupplier');
			Route::get('{supplierId}/deleteitem/{itemId}', 'DeleteItemSupplier')->name('deleteitemsupplier');
		});
	});

	Route::group(['prefix' => 'scmitem','namespace' => 'scmitem'], function(){
		Route::get('listscmitem','SCMItemList')->name('listscmitem');
		Route::get('/{itemId?}','SCMItemView')->name('scmitem');
		Route::post('addscmitem','AddSCMItemAction')->name('addscmitem');
		Route::post('editscmitem/{itemId}','EditSCMItem')->name('editscmitem');
		Route::get('deletescmitem/{itemId}', 'DeleteSCMItem')->name('deletescmitem');
	});

	Route::group(['prefix' => 'scmservice'], function(){
		Route::match(['get','post'],'','SCMService')->name('scmservice');
	});

	Route::group(['prefix' => 'requestform'], function(){
		Route::match(['get','post'],'','SCMRequestForm')->name('requestform');
		Route::match(['get','post'],'item','SCMRequestFormItem')->name('requestformitem');
	});

	Route::group(['prefix' => 'purchaselist'], function(){
		Route::match(['get','post'],'','SCMPurchaseList')->name('purchaselist');
		Route::match(['get','post'],'item','SCMPurchaseItem')->name('purchaseitem');
	});
});

Route::group(['prefix' => 'employee','namespace' => 'employee'], function(){
	Route::get('employeelist','EmployeeList')->name('employeelist');
	Route::match(['get','post'],'','EmployeeView')->name('employee');
	Route::post('addemployee','AddEmployeeAction')->name('addemployee');
	Route::match(['get','post'],'edit/{id}','EditEmployee')->name('editemployee');
	Route::get('delete/{id}','DeleteEmployee')->name('deleteemployee');

	Route::group(['prefix' => 'detail', 'namespace' => 'detail'], function(){
		Route::match(['get','post'],'/{id}','DetailEmployee')->name('detailemployee');
		/**Edu */
		Route::group(['namespace' => 'edu'], function(){
			Route::get('{id}/educationlist','EducationList')->name('educationlist');
			Route::post('{id}/addeducation','AddEducationAction')->name('addeducation');
			Route::match(['get','post'],'{employeeId}/education/{id}','EditEducation')->name('editeducation');
			Route::get('deleteedu/{id}','DeleteEducation')->name('deleteedu');
		});
		/**Skill */
		Route::group(['namespace' => 'skill'], function(){
			Route::get('{employeeId}/skilllist','SkillList')->name('skilllist');
			Route::post('{employeeId}/addskill','AddSkillAction')->name('addskill');
			Route::match(['get','post'],'{employeeId}/skill/{id}','EditSkill')->name('editskill');
			Route::get('deleteskill/{id}','DeleteSkill')->name('deleteskill');
		});
		/**Job */
		Route::group(['namespace' => 'job'], function(){
			Route::get('{employeeId}/joblist','JobList')->name('joblist');
			Route::post('{employeeId}/addjob','AddJobAction')->name('addjob');
			Route::match(['get','post'],'{employeeId}/job/{id}','EditJob')->name('editjob');
			Route::get('deletejob/{id}','DeleteJob')->name('deletejob');
		});
	});

	Route::group(['prefix' => 'group', 'namespace' => 'group'], function(){
		Route::get('groupemployeelist','GroupEmployeeList')->name('groupemployeelist');
		Route::match(['get','post'],'','EmployeeGroup')->name('employeegroup');
		Route::match(['get','post'],'editgroup/{id}','EditEmployeeGroup')->name('editgroup');
		Route::match(['get','post'],'permission/{id}','EmployeePermission')->name('employeepermission');
		Route::post('addgroup','AddGroupEmployeeAction')->name('addgroupemployee');
		Route::get('delete/{id}','DeleteEmployeeGroup')->name('deletegroup');
		Route::get('member/{id}','EmployeeMemberList')->name('membergrouplist');
		Route::get('membergroup/{id}','EmployeeMember')->name('membergroup');
	});
});

Route::group(['prefix' => 'customer', 'namespace' => 'customer'], function(){
	Route::match(['get','post'],'','CustomerView')->name('customer');
	Route::group(['prefix' => 'sale'], function(){
		Route::match(['get','post'],'','SaleForCustomerView')->name('saleforcustomer');
		Route::match(['get','post'],'detail','DetailSaleForCustomerView')->name('detailsaleforcustomer');
	});

	Route::group(['prefix' => 'eval'], function(){
		Route::match(['get','post'],'','EvalCustomerView')->name('evalcustomer');
		Route::match(['get','post'],'add','AddEvalCustomerView')->name('addevalcustomer');
	});

	Route::group(['prefix' => 'itemprice'], function(){
		Route::match(['get','post'],'','salePriceItemList')->name('itemprice');
	});

	Route::group(['prefix' => 'saleitem'], function(){
		Route::match(['get','post'],'','saleItemList')->name('saleitem');
	});
});

Route::group(['prefix' => 'project', 'namespace' => 'project'], function(){
	Route::match(['get','post'],'','ProjectView')->name('projectview');
	Route::match(['get','post'],'gantt','GanttChartView')->name('gantttview');
	Route::group(['prefix' => 'note',], function(){
		Route::match(['get','post'],'','ProjectNoteView')->name('projectnoteview');
	});

	Route::group(['prefix' => 'task',], function(){
		Route::match(['get','post'],'','ProjectTaskView')->name('projecttaskview');
		Route::group(['prefix' => 'result',], function(){
			Route::match(['get','post'],'','ResultOfProjectTaskView')->name('projecttaskresultview');
		});
	});
});

Route::group(['prefix' => 'config','namespace' => 'config'], function(){

	Route::group(['prefix' => 'company','namespace' => 'company'], function(){
		Route::get('','CompanyView')->name('company');
		Route::get('companyrepresentativeslist','CompanyRepresentativesList')->name('companyrepresentativeslist');
		Route::get('delete/{id}','DeleteCompanyRepresentative')->name('deletecompanyrepresentative');
		Route::post('editcompany','editCompanyAction')->name('editcompany');
		Route::post('addcompanyrepresentatives','AddCompanyRepresentativesAction')->name('addcompanyrepresentatives');
		Route::match(['get','post'],'editrepresentative/{id}','EditCompanyRepresentatives')->name('editcompanyrepresentatives');
	});

	Route::group(['prefix' => 'department','namespace' => 'department'], function(){
		Route::match(['get','post'],'','DepartmentView')->name('department');
		Route::match(['get','post'],'adddaction','addDepartmentAction')->name('adddepartmentaction');
		Route::get('listdata','DepartmentList')->name('listdatadepartment');
		Route::match(['get','post'],'editdepartment/{id}','EditDepartment')->name('editdepartment');
		Route::get('delete/{id}','DeleteDepartment')->name('deletedepartment');
		Route::group(['prefix' => 'member','namespace' => 'member'], function(){
			Route::get('list/{id}','DepartmentMemberList')->name('departmentmemberlist');
			Route::get('{id}','DepartmentMember')->name('departmentmember');
		});
		Route::group(['prefix' => 'itemgroup','namespace' => 'itemgroup'], function(){
			Route::get('list/{departmentId?}','ItemGroupList')->name('itemgroup');
			Route::match(['get','post'],'view/{departmentId}','ItemGroupView')->name('itemgroupview');
			Route::match(['get','post'],'add/{departmentId}','AddItemGroupAction')->name('additemgroup');
			Route::match(['get','post'],'edit/{id}','EditItemGroup')->name('edititemgroup');
			Route::get('delete/{id}','DeleteItemGroup')->name('deleteitemgroup');
			Route::group(['prefix' => 'item','namespace' => 'item'], function(){
				Route::get('view/{itemGroupId}/{CateId?}', 'DetailItemGroupCategoryView')->name('detailitemgroupcategoryview');
				Route::match(['get','post'],'addcategory/{departmentId}','AddDetailItemGroupCategoryAction')->name('adddetailitemgroupcategoryaction');
				Route::get('deletecate/{CateId}','DeleteDetailItemGroupCategory')->name('deletedetailitemgroupcategory');
				Route::post('editcate/{CateId}','EditDetailItemGroupCategory')->name('editdetailitemgroupcategory');

				Route::get('additemlist/{ItemGroupCategoryId}', 'AddItemList')->name('additemlist');
				Route::match(['get','post'],'additem/{DetailItemGroupCategoryId}','AddDetailItemGroupAction')->name('adddetailitemgroupaction');
				Route::get('deleteitem/{ItemId}/{CateId}','DeleteDetailItemGroup')->name('deletedetailitemgroup');
			});
		});
	});

	// Route::group(['prefix' => 'itemgroup','namespace' => 'itemgroup'], function(){
	// 	Route::get('list/{departmentId?}','ItemGroupList')->name('itemgroup');
	// });

	Route::group(['prefix' => 'position','namespace' => 'position'], function(){
		Route::get('positionlist','PositionList')->name('positionlist');
		Route::match(['get','post'],'','PositionView')->name('position');
		Route::match(['get','post'],'edit/{id}','EditPosition')->name('editposition');
		Route::post('addposition','AddPositionAction')->name('addposition');
		Route::get('delete/{id}','DeletePosition')->name('deleteposition');
	});

	Route::group(['prefix' => 'costcategory','namespace' => 'costcategory'], function(){
		Route::get('costcategorylist','CostCategoryList')->name('costcategorylist');
		Route::match(['get','post'],'','CostCategoryView')->name('costcategory');
		Route::post('addcostcategory','AddCostCategoryAction')->name('addcostcategory');
		Route::match(['get','post'],'edit/{id}','EditCostCategory')->name('editcostcategory');
		Route::get('delete/{id}','DeleteCostCategory')->name('deletecostcategory');
	});

	Route::group(['prefix' => 'evalform','namespace' => 'evalform'], function(){
		Route::get('evalformlist','EvalFormList')->name('evalformlist');
		Route::match(['get','post'],'','EvalFormView')->name('evalform');
		Route::post('addevalform','AddEvalFormAction')->name('addevalformaction');
		Route::match(['get','post'],'editevalform/{id}','EditEvalForm')->name('editevalform');
		Route::get('delete/{id}','DeleteEvalForm')->name('deleteevalform');
		Route::group(['prefix' => 'item'], function(){
			Route::get('itemlist/{id}','EvalformItemList')->name('evalitemlist');
			Route::match(['get','post'],'{id}','EvalFormItemView')->name('evalformitem');
			Route::post('add/{id}','AddEvalformItemAction')->name('addevalformitem');
		});

	});

	Route::group(['prefix' => 'revenuecategory','namespace' => 'revenuecategory'], function(){
		Route::get('revenuecategorylist','RevenueCategoryList')->name('revenuecategorylist');
		Route::match(['get','post'],'','RevenueView')->name('revenuecategory');
		Route::post('add','AddRevenueCategoryAction')->name('addrevenuecategory');
		Route::match(['get','post'],'edit/{id}','EditRevenueCategory')->name('editrevenuecategory');
		Route::get('delete/{id}','DeleteRevenueCategory')->name('deleterevenuecategory');
	});

	Route::group(['prefix' => 'profitsharecategory','namespace' => 'profitsharecategory'], function(){
		Route::get('profitsharecategorylist','ProfitShareCategoryList')->name('profitsharecategorylist');
		Route::match(['get','post'],'','ProfitShareView')->name('profitsharecategory');
		Route::post('add','AddProfitShareCategoryAction')->name('addprofitsharecategory');
		Route::match(['get','post'],'edit/{id}','EditProfitShareCategory')->name('editprofitsharecategory');
		Route::get('delete/{id}','DeleteProfitShareCategory')->name('deleteprofitsharecategory');
	});

	Route::group(['prefix' => 'paymentmethod','namespace' => 'paymentmethod'], function(){
		Route::get('paymentmethodlist','PaymentMethodList')->name('paymentmethodlist');
		Route::match(['get','post'],'','paymentMethodView')->name('paymentmethod');
		Route::match(['get','post'],'edit/{id}','editPaymentMethodView')->name('editpaymentmethodview');
		Route::post('add','AddPaymentMethodAction')->name('addpaymentmethod');
		Route::match(['get','post'],'edit/{id}','EditPaymentMethod')->name('editpaymentmethod');
		Route::get('delete/{id}','DeletePaymentMethod')->name('deletepaymentmethod');
	});

	Route::group(['prefix' => 'bank','namespace' => 'bank'], function(){
		Route::get('banklist','BankList')->name('banklist');
		Route::match(['get','post'],'','BankView')->name('bank');
		Route::post('add','AddBankAction')->name('addbank');
		Route::match(['get','post'],'edit/{id}','EditBank')->name('editbank');
		Route::get('delete/{id}','DeleteBank')->name('deletebank');
	});

	Route::group(['prefix' => 'taxcategory','namespace' => 'taxcategory'], function(){
		Route::get('taxcategorylist','TaxCategoryList')->name('taxcategorylist');
		Route::match(['get','post'],'','taxCategoryView')->name('taxcategory');
		Route::match(['get','post'],'edit/{id}','EditTaxCategory')->name('edittaxcategory');
		Route::post('add','AddTaxCategoryAction')->name('addtaxcategory');
		Route::get('delete/{id}','DeleteTaxCategory')->name('deletetaxcategory');
	});

	Route::group(['prefix' => 'discount','namespace' => 'discount'], function(){
		Route::match(['get','post'],'','DiscountView')->name('discount');
		Route::match(['get','post'],'edit/{id}','editDiscountView')->name('editdiscountview');
	});

	Route::group(['prefix' => 'itemcategory','namespace' => 'itemcategory'], function(){
		Route::get('itemcategorylist','ItemCategoryList')->name('itemcategorylist');
		Route::match(['get','post'],'','ItemCategoryView')->name('itemcategory');
		Route::post('add','AddItemCategoryAction')->name('additemcategory');
		Route::match(['get','post'],'edit/{id}','EditItemCategory')->name('edititemcategory');
		Route::get('delete/{id}','DeleteItemCategory')->name('deleteitemcategory');
	});

	Route::group(['prefix' => 'item','namespace' => 'item'], function(){
		Route::get('itemlist','ItemList')->name('itemlist');
		Route::match(['get','post'],'','ItemView')->name('item');
		Route::post('add','AddItemAction')->name('additem');
		Route::match(['get','post'],'edit/{id}','EditItem')->name('edititem');
		Route::get('delete/{id}','DeleteItem')->name('deleteitem');
	});

	Route::group(['prefix' => 'servicecategory','namespace' => 'servicecategory'], function(){
		Route::get('servicecategorylist','ServiceCategoryList')->name('servicecategorylist');
		Route::match(['get','post'],'','ServiceCategoryView')->name('servicecategory');
		Route::match(['get','post'],'edit/{id}','EditServiceCategory')->name('editservicecategory');
		Route::post('add','AddServiceCategoryAction')->name('addservicecategory');
	});

	Route::group(['prefix' => 'service','namespace' => 'service'], function(){
		Route::get('servicelist','ServiceList')->name('servicelist');
		Route::match(['get','post'],'','ServiceView')->name('service');
		Route::post('add','AddServiceAction')->name('addservice');
		Route::match(['get','post'],'edit/{id}','EditService')->name('editservice');
		Route::get('delete/{id}','DeleteService')->name('deleteservice');
	});

	Route::group(['prefix' => 'approve','namespace' => 'approve'], function(){
		Route::get('list','ApproveList')->name('approvelist');
		Route::get('','ApproveView')->name('approve');
		Route::post('add','AddApproveAction')->name('addapproveaction');
		Route::match(['get','post'],'edit/{id}','EditApprove')->name('editapprove');
		Route::get('delete/{id}','DeleteApprove')->name('deleteapprove');
	});

	Route::group(['prefix' => 'status','namespace' => 'taskstatus'], function(){
		Route::get('list','TaskStatusList')->name('taskstatuslist');
		Route::get('','TaskStatusView')->name('taskstatus');
		Route::post('add','AddTaskStatusAction')->name('addtaskstatusaction');
		Route::match(['get','post'],'edit/{id}','EditTaskStatus')->name('edittaskstatus');
		Route::get('delete/{id}','DeleteTaskStatus')->name('deletetaskstatus');
	});

	Route::group(['prefix' => 'unit','namespace' => 'unit'], function(){
		Route::get('unitlist','UnitList')->name('unitlist');
		Route::match(['get','post'],'','UnitView')->name('unit');
		Route::post('add','AddUnitAction')->name('addunit');
		Route::match(['get','post'],'edit/{id}','EditUnit')->name('editunit');
		Route::get('delete/{id}','DeleteUnit')->name('deleteunit');
	});

	Route::group(['prefix' => 'suppliercategory','namespace' => 'suppliercategory'], function(){
		Route::get('list','SupplierCategoryList')->name('suppliercategorylist');
		Route::match(['get','post'],'','SupplierCategoryView')->name('suppliercategory');
		Route::post('add','AddSupplierCategoryAction')->name('addsuppliercategory');
		Route::match(['get','post'],'edit/{id}','EditSupplierCategory')->name('editsuppliercategory');
		Route::get('delete/{id}','DeleteSupplierCategory')->name('deletesuppliercategory');
	});

	Route::group(['prefix' => 'market','namespace' => 'market'], function(){
		Route::get('list','MarketList')->name('marketlist');
		Route::match(['get','post'],'','MarketView')->name('market');
		Route::post('add','AddMarketAction')->name('addmarketaction');
		Route::match(['get','post'],'edit/{id}','EditMarket')->name('editmarket');
		Route::get('delete/{id}','DeleteMarket')->name('deletemarket');
	});

});

Auth::routes();