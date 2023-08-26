<template>
    <div class="container">
        <div class="row justify-content-center col-10">
            <Table />
        </div>
    </div>
</template>

<script>
import Table from "./ListingTable/Table.vue";
export default {
    name: "UserMessageList",
    components: {Table}
}
</script>

<style scoped>

</style>
