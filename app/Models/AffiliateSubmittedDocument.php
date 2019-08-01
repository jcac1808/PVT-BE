<?php

namespace Muserpol\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateSubmittedDocument extends Model
{
    protected $guarded = [];
    public function affiliate()
    {
        return $this->belongdTo(Affiliate::class);
    }
    public function procedure_document()
    {
        return $this->belongsTo(ProcedureDocument::class);
    }
    public function procedure_requirements()
    {
        return $this->hasMany('Muserpol\Models\ProcedureRequirement');
    }

}
