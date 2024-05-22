<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        // Kolom-kolom lainnya,
        'access_menu','id','employee_id', 'fullname', 'gender', 'email', 'group_company',
        'designation', 'job_level', 'company_name', 'contribution_level_code',
        'work_area_code', 'office_area', 'manager_l1_id', 'manager_l2_id',
        'employee_type', 'unit', 'date_of_joining', 'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function goal()
    {
        return $this->belongsTo(Goal::class, 'users_id', 'users_id');
    }
    
    public function approvalRequest()
    {
        return $this->hasMany(ApprovalRequest::class, 'employee_id', 'employee_id');
    }

    public function approvalLayer()
    {
        return $this->hasMany(ApprovalLayer::class, 'employee_id', 'id');
    }
    public function approvalManager()
    {
        return $this->hasMany(ApprovalRequest::class, 'employee_id', 'current_approval_id');
    }
    public function creatorApproverLayer()
    {
        return $this->hasMany(ApprovalLayer::class, 'creator_id', 'id');
    }

}
