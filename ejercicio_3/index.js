var isPalindrome = require('is-palindrome');
var words = require('an-array-of-english-words')

const palindromes = []
const seed = "afoolishconsistencyisthehobgoblinoflittlemindsadoredbylittlestatesmenandphilosophersanddivineswithconsistencyagreatsoulhassimplynothingtodohemayaswellconcernhimselfwithhisshadowonthewallspeakwhatyouthinknowinhardwordsandtomorrowspeakwhattomorrowthinksinhardwordsagainthoughitcontradicteverythingyousaidtodayahsoyoushallbesuretobemisunderstoodisitsobadthentobemisunderstoodpythagoraswasmisunderstoodandsocratesandjesusandlutherandcopernicusandgalileoandnewtonandeverypureandwisespiritthatevertookfleshtobegreatistobemisunderstood"
words.forEach(word => {
    if( seed.indexOf(word) >= 0 ){
        if(isPalindrome(word)){
            palindromes.push(word)
        }
    }
})

console.log(palindromes)
