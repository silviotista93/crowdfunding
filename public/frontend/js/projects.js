function start(){
    let container = $("#projectContainer");
    if (projects.data.length>0){
        //console.clear();
        //console.log(projects.data);
        //let content = '<div class="row">';
        let content = '';
        let num= 0;
        projects.data.forEach(project => {
            /*
            if (num++ === 2){
                num = 0;
                content += '</div><div class="row">';
            }
            */
            content += createCard(project);
        });
        //content += "</div>";
        container.html(content);
    }else{
        container.html("<div class='text-center'><p>No hay proyectos</p></div>");
    }

    //checkProjects();
}

function checkProjects(){
    $("#sidebar").on('click', 'a', function (e){
        let spans = $(this).find("span");
        //console.log(spans[1].text());
        if (spans[1].text() === "(0)"){
            alert("No hay proyectos en esta categoria");
        }
        e.preventDefault();
    });
}

function createCard(project){
    let porcetaje = (project.total*100)/project.price;
    if (porcetaje < 1){
        porcetaje = 0;
    }
    return cardLayout
    .replace(/__porcentaje__/g, porcetaje)
    .replace(/__title__/g, project.nameLimit)
    .replace(/__coste__/g, project.price)
    .replace(/__porcentajeBar__/g, porcetaje>100?100:porcetaje)
    .replace(/__tipo__/g, '<li><a href="">'+project.category.category+'</a></li>')
    .replace(/__days__/g, moment(project.end_time).fromNow(true))
    .replace(/__img__/g, project.img);
}


const cardLayout = `
<div class="xs-col-3-isotope-grid-item comics crafts">
    <div class="fundpress-grid-item-content xs-mb-30">
        <div class="xs-item-header fundpress-item-header">
            <img src="__img__" alt="">
            <div class="xs-item-header-content">
                <div class="xs-skill-bar">
                    <div class="xs-skill-track">
                        <p><span class="number-percentage-count number-percentage"
                                data-value="__porcentajeBar__"
                                data-animation-duration="3500">0</span>%</p>
                    </div>
                </div>
            </div>
        </div><!-- .xs-item-header .fundpress-item-header END -->
        <div class="xs-item-content fundpress-item-content">
            <ul class="xs-simple-tag fundpress-simple-tag">
                __tipo__
            </ul>
            <a href="#"
            class="xs-post-title color-navy-blue fundpress-post-title">__title__</a>
            <ul class="xs-list-with-content fundpress-list-item-content">
                <li>$__coste__<span>Pledged</span></li>
                <li><span class="number-percentage-count number-percentage"
                        data-value="__porcentaje__" data-animation-duration="3500">0</span>%
                    <span>Funded</span></li>
                <li>__days__<span>Days To Go</span></li>
            </ul>
            <span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
            <div class="row xs-margin-0">
                <div class="full-round fundpress-avatar">
                    <img src="assets/images/avatar/avatar_1.jpg" alt="">
                </div>
                <div class="xs-avatar-title">
                    <a href="#"><span>By</span>Ema Watson</a>
                </div>
            </div>
        </div><!-- .xs-item-content .fundpress-item-content END -->
    </div>
</div>
`;

start();