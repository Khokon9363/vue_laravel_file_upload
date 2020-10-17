<template>
    <div class="col-sm-4 m-auto">
        <div class="card-body bg-light">

            <span class="text-success">{{ success }}</span>
            <form @submit.prevent="store" method="post" enctype="multipart/form-data">
                <input type="text" name="name" v-model="name">
                <input type="file" name="image" id="image" @change="imageFile">
                <img src="" id="imgPreview">
                <input type="submit" class="btn btn-success btn-sm" value="Save">
            </form>

        </div>
    </div>
</template>

<script>
export default {
name: "AddComponent",
    data(){
        return {
            success : '',
            name    : '',
            image: ''
        }
    },
    methods : {
        imageFile(e) {
          if (e.target.files[0]) {
             let imageFile = e.target.files[0];
             let reader = new FileReader();
             reader.onload = function () {
                 let output = document.getElementById('imgPreview');
                 output.src = reader.result;
                 output.style.width = "25%"
             }
             reader.readAsDataURL(e.target.files[0])
          }
        },
        store() {
            let data = new FormData();
            let img = document.getElementById("image").files[0];
            data.append('image', img);
            data.append('name', this.name);

            axios.post('save', data)
                .then(response => {
                    this.name = '';
                    $('#image').val('');
                    $('#imgPreview').src = '';
                    this.success = 'Data inserted successfully'
                }).catch(error => {
                    console.log(error);
            })
        },
    }
}
</script>

<style scoped>

</style>
