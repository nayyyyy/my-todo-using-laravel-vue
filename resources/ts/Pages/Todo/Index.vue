<template>

</template>

<script>
import axiosRequest from "../../Utils/AxiosRequest.ts";
export default {
    name: 'Todo',
    data() {
        return {
            todos: []
        };
    },
    mounted() {
        axiosRequest.get('todos')
            .then(response => {
                this.todos = response.data.data
            })
    }
}
</script>
