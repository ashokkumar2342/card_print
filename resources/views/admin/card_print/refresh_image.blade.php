@php
$result_p='app'.$get_files_paths[0]->result_p;
$profile2 = route('admin.card.customize.result_p',Crypt::encrypt($result_p)); 
@endphp
<img  src="{{  $profile2  }}" width="70%">