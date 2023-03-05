<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Publication</h5>
            <!-- General Form Elements -->
            <form>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Titre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" v-model="post.title">
                    </div>
                </div>

                <tinyEditor v-model="post.description"></tinyEditor>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Poster</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>
</template>
<script>
import TinyEditor from './TinyEditor.vue';

export default {
    components: {
        TinyEditor
    },
    data() {
        return {
            post: {
                title: '',
                description: ''
            }
        }
    }
}
</script> 