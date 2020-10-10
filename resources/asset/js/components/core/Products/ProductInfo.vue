<template>
	<v-row justify="center">
    	<v-dialog v-model="infoModel" persistent max->
      		<v-card>
        		<v-card-title>
          			<span class="headline">Информация о продукте</span>
        		</v-card-title>
        		<v-card-text>
        			<v-carousel
						cycle
							height="400"
						hide-delimiter-background
						show-arrows-on-hover
						>
						<v-carousel-item
  							v-for="(slide, i) in slides"
  							:key="i"
						>
  							<v-img
            					class="elevation-6"
            					src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
          					></v-img>
						</v-carousel-item>
					</v-carousel>
          			<v-container>
            			<v-row>
              				<v-col cols="12">
              					<v-row>
              						<v-col
              							cols="4"
              							class="d-flex justify-end font-weight-black"
              						>Название</v-col>
              						<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
                					<v-col
                						class="text-black"
                					>{{product.title}}</v-col>
                				</v-row>
              				</v-col>
              				<v-col cols="12">
              					<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Уникальна ссылка</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{product.slug}}</v-col>
	                			</v-row>
              				</v-col>
              				<v-col cols="12">
                				<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Цена</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{product.price}}</v-col>
	                			</v-row>
              				</v-col>
              				<v-col cols="12">
                				<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Бранд</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{product.brand}}</v-col>
	                			</v-row>
              				</v-col>
              				<v-col cols="12">
                				<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Описание</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{product.description}}</v-col>
	                			</v-row>
              				</v-col>
              				<v-col cols="12">
                				<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Материал</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{product.manufacturer}}</v-col>
	                			</v-row>
              				</v-col>
              				<v-col cols="12">
                				<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Подкатегория</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{getSubCategory.title}}</v-col>
	                			</v-row>
              				</v-col>
              				<v-col cols="12">
                				<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Последние обновление</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{product.updated_at}}</v-col>
	                			</v-row>
              				</v-col>
              				<v-col cols="12">
                				<v-row>
	                				<v-col
	                					cols="4"
	                					class="d-flex justify-end font-weight-black"
	                				>Создано</v-col>
	                				<v-divider
      									class="mx-4"
      									vertical
    								></v-divider>
	                				<v-col>{{product.created_at}}</v-col>
	                			</v-row>
              				</v-col>
            			</v-row>
          			</v-container>
        		</v-card-text>
        		<v-card-actions>
          			<v-spacer></v-spacer>
          			<v-btn color="blue darken-1" text @click="$emit('update:infoModel', false)">Окей</v-btn>
        		</v-card-actions>
      		</v-card>
    	</v-dialog>
  </v-row>
</template>

<script>
	export default{
		props: ['infoModel', 'product'],
		data: function () {
			return {
				colors: [
          			'indigo',
          			'warning',
          			'pink darken-2',
          			'red lighten-1',
          			'deep-purple accent-4',
        		],
        		slides: [
          			'First',
          			'Second',
          			'Third',
          			'Fourth',
          			'Fifth',
        		],
			}
		},
        computed:{
            getSubCategory: function () {
                if (this.product.sub_category) {
                    return this.product.sub_category[0];    
                }
                return [];
            }
        }
	}
</script>