// from Controller

return view('dojo.index')->with('variable', $variable);

// from blade file
<script>
  {{ json_encode($variable) }}
</script>
