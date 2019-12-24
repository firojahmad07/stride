<template>
    <div>
        <button class = "btn btn-indigo btn-block" 
            v-on:click="action"> {{ label }}      
        </button>
    </div>
</template>
<script>
export default {
    props:{
        action: {
            type: string
        },
        label: {
            type: string
        }
    }
}
</script>