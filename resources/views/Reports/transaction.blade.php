@if ($transaction->transaction == 2)
    ايراد
@elseif ($transaction->transaction == 1)
    مصروف
@else
    غير معروف
@endif
