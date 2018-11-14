
$("#categoryProjects").on('click', 'li', function(e){
    let id = $(this).attr("data-id");
    let category = $(this).attr("data-category");
    let container = $("#projectsView"+id);
    let cantidad = container.attr("data-cantidad");
    let content = '<div class="row">';
    $.get('/projects-for-category', {id: id}, function (r){
        if (r.length < 1){
            content += "<div class='text-center' style='width:100%;'><p>No hay proyectos</p></div>";
        }
        if (cantidad !== r.length+""){
            container.attr('data-cantidad', r.length);
            r.forEach((project, key) => {
                if (key==3){
                    content += '</div><div class="row">';
                }
                console.log(project);
                content += createCard(project, category);
            });
            content += "</div>";
            container.html(content);
            
            startCard();
        }
    });
});

function createCard(project, category){
    let porcetaje = (project.total*100)/project.price;
    if (porcetaje < 1){
        porcetaje = 0;
    }
    return show
    .replace(/__porcentaje__/g, porcetaje)
    .replace(/__title__/g, project.title)
    .replace(/__coste__/g, project.price)
    .replace(/__porcentajeBar__/g, porcetaje>100?100:porcetaje)
    .replace(/__tipo__/g, '<li><a href="">'+category+'</a></li>')
    .replace(/__days__/g, moment(project.end_time).fromNow(true));
}

function startCard(){
    let number_percentage = $(".number-percentage:not(.setLoad)");
    number_percentage.each(function() {
        let value = $(this).attr("data-value");
        let duration = $(this).attr("data-animation-duration");
        if (parseInt(value)< 1) {
            return;
        }
        fnAnima($(this), $(this).attr("data-value"), true, parseInt(duration, 10));
        $(this).closest('.xs-skill-bar').find('.xs-skill-track').animate({
            width: value + '%'
            }, 4500);
        $(this).addClass("setLoad");
    });
}

function fnAnima (element, stop, commas, duration, ease) {
    return element.each(function() {
        let start = parseInt(element.text().replace(/,/g, ""), 10);
        commas = (commas === undefined) ? true : commas;
        $({
            value: start
        }).animate({
            value: stop
        }, {
            duration: duration == undefined ? 500 : duration,
            easing: ease == undefined ? "swing" : ease,
            step: function() {
                element.text(Math.floor(this.value));
                if (commas) {
                    element.text(element.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                }
            },
            complete: function() {
                if (parseInt(element.text(), 10) !== stop) {
                    element.text(stop);
                    if (commas) {
                        element.text(element.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    }
                }
            }
        });
    });
}

const show = `
<div class="col-lg-4">
    <!-- progress element -->
    <div class="xs-box-shadow fundpress-popular-item xs-bg-white">
        <div class="fundpress-item-header">
            <img src="assets/images/campaigns/campaigns-1.jpg" alt="">
            <div class="xs-item-header-content">
                <div class="xs-skill-bar">
                    <div class="xs-skill-track">
                        <p><span class="number-percentage-count number-percentage" data-value="__porcentajeBar__" data-animation-duration="3500">0</span>%</p>
                    </div>
                </div>
            </div>
        </div><!-- .xs-item-header .fundpress-item-header END -->
        <div class="fundpress-item-content xs-content-padding bg-color-white">
            <ul class="xs-simple-tag fundpress-simple-tag">
                __tipo__
            </ul>
            <a href="#" class="d-block color-navy-blue fundpress-post-title">__title__</a>
            <ul class="xs-list-with-content fundpress-list-item-content">
                <li>$__coste__<span>Pledged</span></li>
                <li><span class="number-percentage-count number-percentage" data-value="__porcentaje__" data-animation-duration="3500">0</span>% <span>Funded</span></li>
                <li>__days__<span>Days to go</span></li>
            </ul>
        </div><!-- .fundpress-item-content END -->
    </div>
</div>
`;



$("#categoryProjects li a")[0].click();