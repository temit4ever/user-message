<template>
    <div class="d-flex flex-row mb-3 px-2 py-2 mb-4 rounded shadow">
        <caption>List of records</caption>
        <FormModal/>
    </div>
    <table class="table table-striped-columns table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in data" :key="index">
            <th scope="row">{{ ++index }}</th>
            <td>{{ item.name }}</td>
            <td>{{ item.message }}</td>
        </tr>
        <span v-if="data == null">
           <tr>
               <p class="px-2 py-2 mb-1 mt-1 text-black-600 ">
                   No record is available
               </p>
           </tr>
        </span>
        </tbody>
    </table>
</template>

<script>
import FormModal from "../Modal/FormModal.vue";
import {onMounted, ref} from "vue";
import axios from "axios";
export default {
    components: {FormModal},
    setup() {
        let data = ref([]);
        onMounted(() => {
           axios
               .get('http://user-message.test:8080/api/lists')
               .then( (response) => {
                   data.value = response.data.result
               })
               .catch((error) => {
                console.log(error.response.data);
            });
        });

        return {
            data
        }
    },
}
</script>

<style scoped>

</style>
