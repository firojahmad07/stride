<template>
    <div class="az-content-breadcrumb">
        <span>{{ mainPage }}</span>
        <span>{{ title }}</span>
    </div>
</template>
<script>
export default {
    name: 'breadcrumb',
    props:{
        mainPage : {
            type: string
        },
        title : {
            type: string
        }
    }
}
</script>