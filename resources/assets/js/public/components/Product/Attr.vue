<template>
    <div class="attr-wrap">
        <div class="card__diameter"
            v-for="item in data"
        >
            <template v-if="item.group.type === 'radio'">
                <span class="title">{{ item.group.content.title }}:</span>
                <div class="group">
                    <label class="checked"
                           v-for="sub in item.subs"
                    >
                        <input type="radio" class="checked__inout"
                               :name="'attr-'+ item.group.id"
                               :value="sub.id"
                               v-model="item.selected"
                        />
                        <span class="checked__square"></span>
                        <span class="checked__text">{{ sub.content.title }}</span>
                    </label>
                </div>
            </template>
            <template v-if="item.group.type === 'select'">
                <select-item
                    type="big"
                    :placeholder="item.group.content.title +': '"
                    :items="item.subs"
                    v-model="item.selected"
                    label="save-holder"
                    name="content.title"
                    use="id"
                    :notreset="true"
                ></select-item>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['items'],
        data: function() {
            return {
                data: this.items
            }
        }
    }
</script>
