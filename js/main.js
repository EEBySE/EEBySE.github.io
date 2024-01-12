let nestedAccordionCounter = 1; // Initialize a counter

function getNestedAccordion(title = "Título", img = "media/Juan.jpg", img_alt = "Juan es grande", item_text = "Mucho texto \n".repeat(10)) {
    // Increment the counter for each new nested accordion
    const uniqueId = nestedAccordionCounter++;

    const nestedAccordionHTML = `
        <!-- Nested accordion -->
        <div class="accordion" id="nestedAccordion${uniqueId}">
            <div class="accordion-item">
                <h2 class="accordion-header" id="nestedHeading${uniqueId}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse${uniqueId}" aria-expanded="true" aria-controls="nestedCollapse${uniqueId}">
                        ${title}
                    </button>
                </h2>
                <div id="nestedCollapse${uniqueId}" class="accordion-collapse collapse" aria-labelledby="nestedHeading${uniqueId}" data-bs-parent="#nestedAccordion${uniqueId}">
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
    new Member('Aldo', 'Siempre trae pre', 'aldo'),
    new Member('Leo', 'El couch', 'leo'),
    new Member('Toño', 'El estético', 'tonio'),
    new Member('Luis', 'El web-dev', 'luis'),
    new Member('Fer', 'El otra-cosa-dev', 'fer'),
]

document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('team-body');

    team.forEach(mem => {
        element.innerHTML += getNestedAccordion(
            mem.name, `media/team/${mem.image}.webp`, 
            `Imagen de ${mem.name}`, mem.position
            );
    })
});