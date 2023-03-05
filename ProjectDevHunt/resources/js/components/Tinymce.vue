<template>
    <div class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TinyMCE Editor</h5>
              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor">
                <p>Entrez votre texte ici!</p>
              </textarea><!-- End TinyMCE Editor -->
              <button id="tinyButton" class="btn-sm" @click="getTextAreaContent">Sousmettre</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script src="https://cdn.tiny.cloud/1/l95prt6l3cvrixwtw5y74d8zg8twmu0ajlcjrize3hmhuoww/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  
  <script>
  export default {
    data() {
      return {
        textArea: '',
      };
    },
    methods: {
      getTextAreaContent() {
        this.textArea = tinymce.activeEditor.getContent();
      },
    },
    mounted() {
      tinymce.init({
        selector: 'textarea',
        plugins:
          'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar:
          'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
          { value: 'First.Name', title: 'First Name' },
          { value: 'Email', title: 'Email' },
        ],
      });
    },
  };
  </script>
  