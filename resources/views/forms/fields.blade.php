<!-- fields.blade.php -->
<div class="grid grid-cols-12 row-gap-8 xxxl:row-gap-3">
@foreach ($fields as $field)
@include('ui::forms.field', ['field' => $field])
@endforeach
</div>
