<template>
  <div>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ stepOneWeights }} <small>kg</small></h3>

            <p>Room 1</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/rooms/first" class="small-box-footer"
            >More info <i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ stepTwoWeights }} <small>kg</small></h3>
            <p>Room 2</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="/rooms/second" class="small-box-footer"
            >More info <i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ stepThreeWeights }} <small>kg</small></h3>

            <p>Room 3</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="/rooms/third" class="small-box-footer"
            >More info <i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Clothes statistics</h5>

        <div class="card-tools">
          <button
            type="button"
            class="btn btn-tool"
            data-card-widget="collapse"
          >
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Country</label>
                <select
                  class="form-control"
                  id="exampleFormControlSelect1"
                  @change="selectCountry($event)"
                >
                  <option
                    value=""
                    selected
                    disabled
                    v-if="customCountries.length > 0"
                  >
                    Select a country
                  </option>
                  <option
                    :value="country.id"
                    v-for="country in customCountries"
                    :key="country.id"
                  >
                    {{ $root.ucfirst(country.name) }}
                  </option>

                  <option v-if="customCountries.length == 0" selected>
                    No countries
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Batch</label>
                <select
                  class="form-control"
                  id="exampleFormControlSelect1"
                  @change="selectBatch($event)"
                >
                  <option value="" selected disabled v-if="batches.length > 0">
                    Select a batch
                  </option>
                  <option
                    :value="batch.id"
                    v-for="batch in batches"
                    :key="batch.id"
                  >
                    {{ $root.ucfirst(batch.name) }}
                  </option>

                  <option v-if="batches.length == 0" selected>
                    No batches
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Quality</label>
                <select
                  class="form-control"
                  id="exampleFormControlSelect1"
                  @change="selectQuality($event)"
                >
                  <option
                    value=""
                    selected
                    disabled
                    v-if="customQualities.length > 0"
                  >
                    Select a quality
                  </option>
                  <option
                    :value="quality.id"
                    v-for="quality in customQualities"
                    :key="quality.id"
                  >
                    {{ $root.ucfirst(quality.name) }}
                  </option>

                  <option v-if="customQualities.length == 0" selected>
                    No qualities
                  </option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Summer clothes</span>
              <span class="float-right">
                {{ $root.formatNumber(summerClothesPercentage) }}%
              </span>

              <div class="progress progress-sm">
                <div
                  class="progress-bar bg-success"
                  :style="{ width: summerClothesPercentage + '%' }"
                ></div>
              </div>
            </div>

            <div class="progress-group mt-3">
              <span class="progress-text">Winter clothes</span>
              <span class="float-right">
                {{ $root.formatNumber(winterClothesPercentage) }}%
              </span>
              <div class="progress progress-sm">
                <div
                  class="progress-bar bg-warning"
                  :style="{ width: winterClothesPercentage + '%' }"
                ></div>
              </div>
            </div>

            <div class="progress-group mt-3">
              <span class="progress-text">Spring clothes</span>
              <span class="float-right">
                {{ $root.formatNumber(springClothesPercentage) }}%
              </span>
              <div class="progress progress-sm">
                <div
                  class="progress-bar bg-danger"
                  :style="{ width: springClothesPercentage + '%' }"
                ></div>
              </div>
            </div>

            <div class="progress-group mt-3">
              <span class="progress-text">Autumn clothes</span>
              <span class="float-right">
                {{ $root.formatNumber(autumnClothesPercentage) }}%
              </span>
              <div class="progress progress-sm">
                <div
                  class="progress-bar bg-primary"
                  :style="{ width: autumnClothesPercentage + '%' }"
                ></div>
              </div>
            </div>

            <!-- /.progress-group -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success"> 100%</span>
              <h5 class="description-header">{{ totalWeights }}</h5>
              <span class="description-text">TOTAL CLOTHES (kg)</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-2 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">
                {{ $root.formatNumber(summerClothesPercentage) }}%
              </span>
              <h5 class="description-header">{{ totalSummerWeights }}</h5>
              <span class="description-text">TOTAL SUMMER CLOTHES (kg)</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-2 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">
                {{ $root.formatNumber(winterClothesPercentage) }}%
              </span>

              <h5 class="description-header">{{ totalWinterWeights }}</h5>
              <span class="description-text">TOTAL WINTER CLOTHES (kg)</span>
            </div>
            <!-- /.description-block -->
          </div>

          <div class="col-sm-2 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">
                {{ $root.formatNumber(springClothesPercentage) }}%
              </span>
              <h5 class="description-header">{{ totalSpringWeights }}</h5>
              <span class="description-text">TOTAL SPRING CLOTHES (kg)</span>
            </div>
            <!-- /.description-block -->
          </div>

          <div class="col-sm-2 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success">
                {{ $root.formatNumber(autumnClothesPercentage) }}%
              </span>
              <h5 class="description-header">{{ totalAutumnWeights }}</h5>
              <span class="description-text">TOTAL AUTUMN CLOTHES (kg)</span>
            </div>
            <!-- /.description-block -->
          </div>
        </div>

           <div class="row mt-3 d-flex justify-content-center">
              <div class="col-sm-2 col-6">
            <div class="description-block border-right">
            
              <h5 class="description-header">{{ this.categories_count }}</h5>
              <span class="description-text">TOTAL  Categories</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-2 col-6">
            <div class="description-block border-right">
            
              <h5 class="description-header">{{ this.qualities.length }}</h5>
              <span class="description-text">TOTAL  Qualities</span>
            </div>
            <!-- /.description-block -->
          </div>
       
        </div>
        <!-- /.row -->
      </div>

      <!-- /.card-footer -->
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    //load full statistics
    this.stepOneWeights = this.statistics.stepOneWeights;
    this.stepTwoWeights = this.statistics.stepTwoWeights;
    this.stepThreeWeights = this.statistics.stepThreeWeights;
    this.stepFourWeights = this.statistics.stepFourWeights;
    this.totalWeights = this.statistics.totalWeights;
    this.totalSummerWeights = this.statistics.totalSummerWeights;
    this.totalWinterWeights = this.statistics.totalWinterWeights;
    this.totalSpringWeights = this.statistics.totalSpringWeights;
    this.totalAutumnWeights = this.statistics.totalAutumnWeights;
    this.summerClothesPercentage = this.statistics.summerClothesPercentage;
    this.winterClothesPercentage = this.statistics.winterClothesPercentage;
    this.springClothesPercentage = this.statistics.springClothesPercentage;
    this.autumnClothesPercentage = this.statistics.autumnClothesPercentage;
    //load countries
    this.customCountries = this.countries;
  },

  data() {
    return {
      stepOneWeights: 0,
      stepTwoWeights: 0,
      stepThreeWeights: 0,
      stepFourWeights: 0,
      totalWeights: 0,
      totalSummerWeights: 0,
      totalWinterWeights: 0,
      totalSpringWeights: 0,
      totalAutumnWeights: 0,
      summerClothesPercentage: 0,
      winterClothesPercentage: 0,
      springClothesPercentage: 0,
      autumnClothesPercentage: 0,
      customCountries: [],
      batches: [],
      customQualities: [],
      batch_id: "",
      country_id: "",
      quality_id: "",
    };
  },
  props: ["countries", "statistics", "qualities","categories_count"],

  methods: {
    selectCountry(event) {
      this.batches = [];
      this.customQualities = [];

      let countryId = event.target.value;
      this.country_id = countryId;

      if (countryId) {
        axios
          .get(`/api/statistics?country_id=${countryId}`)
          .then((response) => {
            // handle success

            this.batches = response.data.batches;
            this.updateStatistics(response.data.statistics);
          })
          .catch((error) => {
            // handle error
            console.log(error);
          });
      }
    },

    selectBatch(event) {
      let batchId = event.target.value;
      this.batch_id = batchId;
      if (batchId) {
        axios
          .get(`/api/statistics?batch_id=${batchId}`)
          .then((response) => {
            // handle success

            this.customQualities = this.qualities;
            this.updateStatistics(response.data.statistics);
          })
          .catch((error) => {
            // handle error
            console.log(error);
          });
      }
    },
    selectQuality() {
      let qualityId = event.target.value;
      this.quality_id = qualityId;
      if (qualityId) {
        axios
          .get(
            `/api/statistics?quality_id=${qualityId}&&batch_id=${this.batch_id}`
          )
          .then((response) => {
            // handle success

            this.customQualities = this.qualities;
            this.updateStatistics(response.data.statistics);
          })
          .catch((error) => {
            // handle error
            console.log(error);
          });
      }
    },
    updateStatistics(statistics) {
      this.totalWeights = statistics.totalWeights;
      this.totalSummerWeights = statistics.totalSummerWeights;
      this.totalWinterWeights = statistics.totalWinterWeights;
      this.totalSpringWeights = statistics.totalSpringWeights;
      this.totalAutumnWeights = statistics.totalAutumnWeights;
      this.summerClothesPercentage = statistics.summerClothesPercentage;
      this.winterClothesPercentage = statistics.winterClothesPercentage;
      this.springClothesPercentage = statistics.springClothesPercentage;
      this.autumnClothesPercentage = statistics.autumnClothesPercentage;
    },
  },
};
</script>
