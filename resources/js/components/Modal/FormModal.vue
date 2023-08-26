<template>
    <button type="button" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-bs-toggle="modal" data-bs-target="#staticBackdrop4" style="margin-left: 72em">
        Add
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop4" tabindex="-1" aria-labelledby="modalLabel4" aria-hidden="true">
        <div class="modal-dialog d-flex justify-content-center">
            <div class="modal-content w-75">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel4">Form Fields </h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form @submit.prevent="submit">
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Name</label>
                            <input v-model="post.name" type="text" id="name" class="form-control" />
                            <div v-if="validation.name" class="px-2 py-2 mb-4 text-red-600 rounded shadow">
                                {{ validation.name[0] }}
                            </div>
                        </div>

                        <!-- textarea input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="message">Your message</label>
                            <textarea v-model="post.message" id="message" rows="4" class="form-control"></textarea>
                            <div v-if="validation.message" class="px-2 py-2 mb-4 text-red-600 rounded shadow">
                                {{ validation.message[0] }}
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {reactive, ref} from "vue";
import axios from "axios";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
export default {
    setup() {
        const post = reactive({
            'name': '',
            'message': ''
        });
        const validation = ref([]);
        function submit() {
            let name = post.name;
            let message = post.message;

            axios
                .post('http://user-message.test:8080/api/create', {
                    name: name,
                    message: message,
                }).then((response) => {
                if (response && response.status === 200) {
                    toast.success('New record has been added successfully');
                    setTimeout(() => {
                        location.reload();
                    }, 3000)
                }
            }).catch((error) => {
                validation.value = error.response.data.errors;
                console.log(error);
            });
        }

        return {
            post,
            validation,
            submit,
        };
    }
}
</script>

<style scoped>

</style>
