<template>
    <div>
        <div class="container">
            <div v-if="on">
                <StreamBarcodeReader
                    @decode="onDecode"
                    @loaded="onLoaded"
                ></StreamBarcodeReader>
            </div>

            <div class="mx-auto text-center mb-4" v-if="on">
                <a href="" @click.prevent="on = false" class="btn btn-danger"
                    >Turn off</a
                >
            </div>

            <div class="mx-auto text-center mb-4" v-if="!on">
                <a href="" @click.prevent="on = true" class="btn btn-primary"
                    >Turn on</a
                >
            </div>
        </div>
    </div>
</template>

<script>
import { StreamBarcodeReader } from "vue-barcode-reader";

export default {
    components: { StreamBarcodeReader },
    mounted() {},
    data() {
        return {
            result: "",
            on: true
        };
    },

    methods: {
        onDecode(result) {
           
            window.livewire.emit("set:search", result);
        },

        onLoaded(loaded) {
          
         
        },
  
    }
};
</script>

<style scoped>
.error {
    font-weight: bold;
    color: red;
}
</style>
