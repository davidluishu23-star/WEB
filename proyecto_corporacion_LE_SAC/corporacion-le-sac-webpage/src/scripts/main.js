document.addEventListener('DOMContentLoaded', () => {
    const brandsContainer = document.getElementById('brands-container');

    const brands = [
        {
            name: 'Agua Fresh',
            description: 'Pure and refreshing mineral water sourced from the pristine mountains.',
            image: 'assets/agua-fresh.jpg', // Placeholder for image path
            link: '#'
        },
        {
            name: 'San Gregorio',
            description: 'Natural mineral water with a unique taste, perfect for hydration.',
            image: 'assets/san-gregorio.jpg', // Placeholder for image path
            link: '#'
        },
        {
            name: 'Agua Crush',
            description: 'Flavored mineral water that adds a twist to your hydration.',
            image: 'assets/agua-crush.jpg', // Placeholder for image path
            link: '#'
        }
    ];

    brands.forEach(brand => {
        const brandElement = document.createElement('div');
        brandElement.classList.add('brand');

        brandElement.innerHTML = `
            <h2>${brand.name}</h2>
            <img src="${brand.image}" alt="${brand.name}">
            <p>${brand.description}</p>
            <a href="${brand.link}">Learn More</a>
        `;

        brandsContainer.appendChild(brandElement);
    });
});