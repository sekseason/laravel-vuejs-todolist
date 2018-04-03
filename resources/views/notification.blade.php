<script>
@if (session('alert'))
let title = '{{ session("alert")["title"] }}'
let message = '{{ session("alert")["message"] }}'

window.alertify.alert(title, message)
@endif

@if (session('notify'))
let type = '{{ session("notify")["type"] }}'
let message = '{{ session("notify")["message"] }}'

window.alertify.notify(message, type, 5)
@endif

@if ($errors->any())
let error = ''
@foreach ($errors->all() as $error)
error += '{{ $error }}<br>'
@endforeach
window.alertify.alert('Oops!', error)
@endif
</script>
