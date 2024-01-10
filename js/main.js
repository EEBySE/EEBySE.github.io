function getNestedAccordiong(title="Título", img="media/Juan.jpg", img_alt="Juan es grande", item_text="Mucho texto \n".repeat(10)) {
    const nestedAccordionHTML = `
        <!-- Nested accordion -->
        <div class="accordion" id="nestedAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="nestedHeadingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapseOne" aria-expanded="true" aria-controls="nestedCollapseOne">
                        ${title}
                    </button>
                </h2>
                <div id="nestedCollapseOne" class="accordion-collapse collapse" aria-labelledby="nestedHeadingOne" data-bs-parent="#nestedAccordion">
                    <div class="accordion-body">
                        <div class="item-content">
                            <img src="${img}" alt="${img_alt}" class="item-image">
                            <div class="item-text">
                                <p>${item_text}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of nested accordion -->
    `;
    return nestedAccordionHTML;
}

class Member {
    constructor(name, position, image){
        this.name = name;
        this.position = position;
        this.image = image;
    }
}

const team = [
    new Member('Aldo', 'Ya perdónenlo', 'aldo'),
    new Member('Leo', 'El doctor', 'leo'),
    new Member('Toño', 'Estético', 'tonio'),
    new Member('Luis', 'Web dev', 'luis'),
    new Member('Fer', 'Otra cosa dev', 'fer'),
]

document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('team-body');

    team.forEach(mem => {
        element.innerHTML += getNestedAccordiong(
            mem.name, `media/team/${mem.image}.webp`, 
            `Imagen de ${mem.name}`, mem.position
            );
    })
});