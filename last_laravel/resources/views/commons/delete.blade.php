<form action="{{ route($_route, $_model) }}" id="delete-form" method="post">
    @csrf
    @method('delete')
</form>
<script>
    function deleteData() {
        event.preventDefault();
        if (window.confirm('本当に削除しますか？')) {
            document.querySelector('#delete-form').submit();
        }
    }
</script>
