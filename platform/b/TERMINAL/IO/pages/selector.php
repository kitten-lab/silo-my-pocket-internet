<div style="position:fixed; width: 60vh;"><H1>LOG SELECTOR
<select id="entrySelector" style="width: 20vh; height: 30px; font-family: 'VT323'; background-color: black; border: 1px solid var(--my-fav-color); color: var(--my-fav-color);">
  <option style="width: 20vh; height: 30px; font-family: 'VT323'; background-color: black; border: 1px solid var(--my-fav-color); color: var(--my-fav-color);">Loading...</option>
</select></H1></div>
<div id="output" style="overflow:scroll; margin-top: 30px;height: 375px; box-shadow: 0 0 30px var(--my-fav-color), inset 0 0 5px var(--my-fav-color); padding: 10px; background:#00000033; border:2px dotted var(--my-fav-color);"></div>
<script>
fetch('../../../b/TERMINAL/IO/SDK-808/current_imports.json')
  .then(res => res.json())
  .then(entries => {
    const select = document.getElementById('entrySelector')
    select.innerHTML = ''

    entries.forEach(entry => {
      const option = document.createElement('option')
      console.log(entry) // 👈 check this
      option.value = entry.path   // ⚠️ MUST EXIST
      option.textContent = entry.title
      select.appendChild(option)




    
    })


  })


document.getElementById('entrySelector').addEventListener('change', (e) => {


  const selected = e.target.value
  localStorage.setItem('currentLog', selected)

  fetch(`../../../k/tools/json.reader/json_catcher.php?file=${encodeURIComponent(selected)}`)
    .then(res => res.text())
    .then(html => {
      document.getElementById('output').innerHTML = html
    })
    

})
</script>