Dependency injection
```scala
// domain
trait Travel
trait Repository[A] {
  def save(a: A): A
}
// repository interface
trait TravelRespository extends Repository[Travel]{
  def save(t: Travel) : Travel
}
// a simple implementation
class TravelRposiotryArangoDB extends TravelRespository {
  def save(t: Travel): Travel = {
    val execute = s"Saving an travel ${t}"
    println(execute)
    t
  }
}

trait TravelService{
  def createTravelRequest (from: String, to: String, tr: TravelRespository) : Travel
}

trait TravelServiceLifted{
  def createTravelRequest (from: String, to: String) : TravelRespository => Travel
}

object TravelServiceLiftedImp extends TravelServiceLifted{
    def createTravelRequest (from: String, to: String) : TravelRespository => Travel = {
      // tr is our dependency
      tr => {
        case class SimpleTravel(from: String, to: String) extends Travel
        tr.save(SimpleTravel(from = from, to = to))
      }
    }
}

val aTravel = TravelServiceLiftedImp.createTravelRequest("Estepona","Malaga")
val database: TravelRespository = new TravelRposiotryArangoDB()
println(aTravel)
```