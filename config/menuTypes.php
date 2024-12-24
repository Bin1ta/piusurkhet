<?php
if(config('default.subDivision'))
{
    return [
        'category',
        'officeDetail',
        'subDivision'
    ];
}
else
{
    return [
        'category',
        'officeDetail',

    ];
}
