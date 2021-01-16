## Dependency injection

// domain
trait Travel
trait Repository[A] {
  def save(a: A): A
}
// repository interface
trait TravelRepository extends Repository[Travel]{
  def save(t: Travel) : Travel
}
// a simple implementation
class TravelRepositoryArangoDB extends TravelRepository {
  def save(t: Travel): Travel = {
    val execute = s"Saving an travel ${t}"
    println(execute)
    t
  }
}

trait TravelService{
  def createTravelRequest (from: String, to: String, tr: TravelRepository) : Travel
}

trait TravelServiceLifted{
  def createTravelRequest (from: String, to: String) : TravelRepository => Travel
}

object TravelServiceLiftedImp extends TravelServiceLifted{
    def createTravelRequest (from: String, to: String) : TravelRepository => Travel = {
      // tr is our dependency
      tr => {
        case class SimpleTravel(from: String, to: String) extends Travel
        tr.save(SimpleTravel(from = from, to = to))
      }
    }
}

val aTravel = TravelServiceLiftedImp.createTravelRequest("Estepona","Malaga")
val database: TravelRepository = new TravelRepositoryArangoDB()
println(aTravel)
