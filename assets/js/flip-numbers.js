import { Flip } from 'number-flip'

export default () => {
    new Flip({
        node: document.querySelector('.number__counter'),
        from: 0,
        to: 12000,
        separator: ',',
        duration: 1,
        direct: false
    });
}