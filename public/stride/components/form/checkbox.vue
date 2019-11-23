<template>
    <div class="col-lg-3">
        <label class="ckbox">
            <input type="checkbox" v-model="id"><span v-show="checkboxLabel">{{ label }}</span>
        </label>
    </div><!-- col-3 -->
</template>

<script>
export default {
    name: 'stride-checbox',
    data() {
        return {
            id:'',
            checkboxLabel: false,
            label: ''
        }
    },
    props: ['checkboxData']    
}
</script>