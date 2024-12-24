<?php
return [
    /**
     * choose the layout of front employee for office chief and information officer
     * choose the value between "horizontal" and "vertical"
     **/
    'employeeSetting' => env('INDEX_EMPLOYEE_SETTING', 'horizontal'),
    /**
     * choose whether to show introduction o index or not
     * choose the value between "true" and "false"
     **/
    'showIntroduction' => env('INDEX_SHOW_INTRODUCTION', true),
    /**
     * choose the layout of introduction on index
     * choose the value between "withEmployee" and "withDocument"
     **/
    'introductionPosition' => env('INDEX_INTRODUCTION_POSITION', 'withEmployee'),

    'updateDate' => env('INDEX_UPDATE_DATE', date('Y-m-d'))
];
