const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');
    
        nama.addEventListener('change',function(){
            fetch('/admin/menus/slugMenu?nama=' +nama.value) ///admin/menus/slugMenu harus sama dengan route // setting route dan model
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
     

    const nama_kategori = document.querySelector('#nama_kategori');
    const slug_kategori = document.querySelector('#slug_kategori');
    
        nama_kategori.addEventListener('change',function(){
            fetch('/admin/kategoris/kategoriSlug?nama_kategori=' +nama_kategori.value)
            .then(response => response.json())
            .then(data => slug_kategori.value = data.slug_kategori)
        });
    
         //mematikan fungsi upload file pada text-editor
      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      })