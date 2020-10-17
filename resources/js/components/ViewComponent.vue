<template>
    <div class="container">
        <table class="table table-bordered text-center">
            <tr>
                <th>SL</th>
                <th>Fruit name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <tr v-for="(fruit,index) in fruits" :key="fruit.id">
                <td>{{ ++index }}</td>
                <td>{{ fruit.name }}</td>
                <td><img :src="'/storage/images/'+fruit.image" style="height: 100px;width: 100px;"></td>
                <td>
                    <button type="button" @click="deleteFruit(fruit.id)" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    name: "ViewComponent",
    data (){
        return{
            fruits : [],
        }
    },
    created() {
        this.getAllData();
    },
    methods : {
        getAllData () {
            axios.get('/view')
                .then (response => {
                    this.fruits = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        deleteFruit(fruitId){
            axios.get('delete_fruit/' + fruitId)
                .then(response => {
                    this.getAllData(),
                        console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style scoped>

</style>
