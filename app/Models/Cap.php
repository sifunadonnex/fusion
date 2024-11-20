<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cap extends Model
{
    use HasFactory;

    protected $table = 'cap_items';

    protected $fillable = [
        'CAPName',
        'CAPStatusId',
        'ReportSource',
        'ResponsiblePersonId',
        'AcceptedStatusCA',
        'AcceptedStatusPA',
        'Finding',
        'FindingGradeId',
        'RiskGrade',
        'RiskLevel',
        'RiskDescription',
        'CompleteByCA',
        'DateCompletedCA',
        'CorrectiveActionCA',
        'Details',
        'CompleteByPA',
        'DateCompletedPA',
        'PreventiveActionPA',
        'ItemText',
        'ItemReference',
        'ItemGuidance',
        'ItemType',
        'CreatedById',
        'isRootCause_On',
        'isCA_on',
        'IdCCUsers',
        'isImplemented_ca',
        'isImplemented_pa',
    ];
}
