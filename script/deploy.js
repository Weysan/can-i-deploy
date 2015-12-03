var app_deploy_list = [ 
                          {'name' : 'Wordpress', 'class': 'wp'}, 
                          {'name' : 'Drupal', 'class': 'drupal'} 
                        ];

/* Init */
var DeployChoices = React.createClass({
  render: function() {
      return (
        <div className="choiceBox">
          <PlatformChoice items={this.props.items} />
        </div>
      );
  }
});

/* Choix de plateforme */
var PlatformChoice = React.createClass({
  getInitialState: function() {
      return({
          platform: ""
      });
  },
  handleChoice: function(choice){
    this.setState({platform: choice});
  },
  shouldComponentUpdate: function( newProps, newState ) {
      return true;
  },
  render: function() {
      if(this.state.platform != ''){
        return(<EnvironmentChoice platform={this.state.platform} />);
      } else {
        return (
          <div className="choicePlatform">
            <h2>Choose your CMS</h2>
            {this.props.items.map(function(item, i) {
              return (
                <a className={item.class} key={i} onClick={this.handleChoice.bind(this, item.class)}>
                  {item.name}
                </a>
              );
            }, this)}
            
          </div>
        );
      }
      
  }
});

/* Choix d'environnement (prod/preprod) */
var EnvironmentChoice = React.createClass({
  getInitialState: function() {
      return({
          environment: ""
      });
  },
  handleChoice: function(choice){
    this.setState({environment: choice});
  },
  shouldComponentUpdate: function( newProps, newState ) {
      return true;
  },
  render: function() {
    if(this.state.environment != ''){
        var question_file_url = this.state.environment + '_' + this.props.platform;
        return(
          <div>
            <p>Question for <strong>{this.props.platform}</strong> in <strong>{this.state.environment}</strong></p>
            <ChecklistBox url={question_file_url} />
          </div>
          );
    } else {
        return (
          <div className="choiceEnvironment">
            <h2>Choose your Environment</h2>
            <a className="preprod" onClick={this.handleChoice.bind(this, 'preprod')}>
              Preproduction
            </a>
            <a className="prod" onClick={this.handleChoice.bind(this, 'prod')}>
              Production
            </a>
          </div>
        );
    }
  }
});



/* lancement checklist */
var ChecklistBox = React.createClass({
  render: function() {
      return (
        <ChecklistForm url={this.props.url} />
      );
  }
});



/* formulaire pour chaque question */
var ChecklistForm = React.createClass({
  getInitialState: function() {
      return({
          data: [],
          displayHelp: 'none',
          count: 0
      });
  },
  //récupération des questions sur le serveur en AJAX
  loadQuestionsFromServer: function() {
    $.ajax({
      url: '/checklists/'+this.props.url+'.php',
      dataType: 'json',
      cache: false,
      success: function(data) {
        this.setState({data: data});
      }.bind(this),
      error: function(xhr, status, err) {
        console.error(this.props.url, status, err.toString());
      }.bind(this)
    });
  },
  //init des questions
  componentDidMount: function() {
    this.loadQuestionsFromServer();
  },
  twitterWjs: function(){
    console.log('twitter JS');
    var funcWjs = !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

    return(funcWjs);
  },
  //affichage de l'aide
  displayHelp: function(){
    this.setState({displayHelp: 'block'});
  },
  //passage à la prochaine question
  nextQuestion: function(){
    var newCount = ++this.state.count;
    this.setState({count: newCount, displayHelp: 'none'});
  },
  //update du composant
  shouldComponentUpdate: function( newProps, newState ) {
      return true;
  },
  render: function() {
    
    if(this.state.data[this.state.count]){
      return(
          <div className="question-box">
            <ChecklistQuestion question={this.state.data[this.state.count].question} />
            <ChecklistResponse onNo={this.displayHelp} onYes={this.nextQuestion} />
            <ChecklistHelp display={this.state.displayHelp} text={this.state.data[this.state.count].aide} />
            <p className="back-to-home">
              <a href="/">Back to home</a>
            </p>
          </div>
          );
    } 

    if(!this.state.count){
      return(<p>Loading</p>);
    }

    if(this.state.count > 0){
      var now= new Date(); 
      var stDate=now.getDay()
      
      var result_deploy = 'You can deploy !';
      var result_deploy_twitter = 'I can deploy my app !';

      if(stDate == 5){
        result_deploy = 'You could deploy, but it\'s friday !';
        result_deploy_twitter = 'I can deploy my app, but it\'s friday !';
      }
      this.twitterWjs();
      return(
          <div className="deploy-result">
            <h1>{result_deploy}</h1>
            <p className="back-to-home">
              <a href="/">Back to home</a>
            </p>
            <p className="tweet-it">
              <a href="https://twitter.com/share" className="twitter-share-button" data-text={result_deploy_twitter} data-hashtags="can-i-deploy">Tweet</a>
            </p>
          </div>
        );
    }
  }
});


/* Display de la question */
var ChecklistQuestion = React.createClass({
  render: function() {
      return (
        <p className="question-text">{this.props.question}</p>
      );
  }
});


/* input radio pour chaque question */
var ChecklistResponse = React.createClass({
  getInitialState: function() {
      return({
          yes: ''
      });
  },
  handleYes: function(){
    this.setState({yes: ''});
    this.props.onYes();
  },
  handleNo: function(){
    this.props.onNo();
  },
  shouldComponentUpdate: function( newProps, newState ) {
      return true;
  },
  render: function() {
      return (
        <p>
          <input type="radio" id="yes" name="response" checked={this.state.yes} onClick={this.handleYes} /><label htmlFor="yes">Yes</label>
          <input type="radio" id="no" name="response" onClick={this.handleNo} /><label htmlFor="no">No</label>
        </p>
      );
  }
});


/* HELP box pour chaque question */
var ChecklistHelp = React.createClass({
  rawMarkup: function() {
    var rawMarkup = marked(this.props.text, {sanitize: false});
    return { __html: rawMarkup };
  },
  render: function() {
      return (
        <div className={this.props.display} id="help">
          <h3>Help</h3>
          <div dangerouslySetInnerHTML={this.rawMarkup()} />
        </div>
      );
  }
});


/* Render */
ReactDOM.render(
  <DeployChoices items={app_deploy_list} />,
  document.getElementById('content')
);