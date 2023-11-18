@if ($transaction->revenue_type == 1)
    كاش
@elseif ($transaction->revenue_type ==2 )
شيك
@else
    غير معروف
@endif
