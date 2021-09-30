/**
 * parent : is span that contains the fontAweson icon,
 * toShow & toHide : are the same element to be shown or hidden after the click event
 */

export function drawRightArrow(parent, toShow) {
    $('#' + toShow).hide()

    let span = document.getElementById(parent)

    let rightArrow = document.createElement('i')
    rightArrow.classList.add('fas')
    rightArrow.classList.add('fa-angle-right')

    span.innerHTML = ''

    rightArrow.addEventListener('click', () => {
        $('#' + toShow).show()
        drawDownArrow(parent, toShow)
    })

    span.appendChild(rightArrow)
}

export function drawDownArrow(parent, toHide) {
    let span = document.getElementById(parent)

    let downArrow = document.createElement('i')
    downArrow.classList.add('fas')
    downArrow.classList.add('fa-angle-down')

    span.innerHTML = ''

    downArrow.addEventListener('click', () => {
        $('#' + toHide).hide()
        drawRightArrow(parent, toHide)
    })

    span.appendChild(downArrow)
}

export function defaultRightArrow(parent, toHide) {
    let span = document.getElementById(parent)

    let downArrow = document.createElement('i')
    downArrow.classList.add('fas')
    downArrow.classList.add('fa-angle-down')

    span.innerHTML = ''

    downArrow.addEventListener('click', () => {
        $('#' + toHide).hide()
        drawRightArrow(parent, toHide)
    })

    span.appendChild(downArrow)
}