* **./bin/build.sh**: build docker container with php7.4
* **./bin/run.sh**: runs MainCommand.php execute() function! do var_dumps() there

```scala
object CommandTrigger {

  object BusinessRules {

    object CommandDomainWellTyped {
      sealed trait CommandType
      case object CliCommand extends CommandType
      case object AndroidCommand extends CommandType
      case class Command(keyword: String = "default", commandType: CommandType = CliCommand, readyToTrigger: Boolean = false)
    }
    val standardCriterionsForCommands = new CommandTriggerCriterion {}

    trait CommandTriggerCriterion {
      import CommandDomainWellTyped._
      
      val defaultCommand = Command()
      type Criteria = (Command, String) => List[Command]
      val criterions: Criteria = (aCommand, aKeyword) => {
        val triggerCommandCriterion0 = if (aCommand.keyword == aKeyword)
          new Command(aKeyword, CliCommand, readyToTrigger = true)
        else defaultCommand
        val triggerCommandCriterion1 = if (aCommand.keyword != aKeyword)
          new Command(aKeyword, AndroidCommand, readyToTrigger = false)
        else defaultCommand
        val allCommands: scala.collection.immutable.List[Command] = scala.collection.immutable.List(
          triggerCommandCriterion0, triggerCommandCriterion1)
        allCommands
      }


      private def evaluateCriterionDefinition(aCommand: Command, aKeyword: String): Criteria => List[Command] = listOfCriterion => {
        listOfCriterion.apply(aCommand, aKeyword)
      }

      def performCriterionEvaluation(aCommand: Command, aKeyword: String): List[Command] = {
        this.evaluateCriterionDefinition(aCommand, aKeyword)(this.criterions)
      }

    }
  }
}
```