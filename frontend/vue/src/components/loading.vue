<template>
    <div>
        <div class="text-xs-center" v-if="loading">
            <v-overlay value="true">
            <v-progress-circular
                :size="50"
                color="primary"
                indeterminate
            ></v-progress-circular>
            </v-overlay>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        loading: Boolean
    }
    
}
</script>