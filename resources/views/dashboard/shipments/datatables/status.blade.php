@if($status == 'pending')
<span class="badge badge-light-warning me-4">{{ t('Pending') }}</span>
@elseif($status == 'in-progress')
<span class="badge badge-light-primary me-4">{{ t('In Progress') }}</span>
@elseif($status == 'complete')
<span class="badge badge-light-success me-4">{{ t('Complete') }}</span>
@elseif($status == 'not-delivered')
<span class="badge badge-light-danger me-4">{{ t('Not Delivered') }}</span>
@endif
